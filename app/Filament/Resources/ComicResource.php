<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComicResource\Pages;
use App\Filament\Resources\ComicResource\RelationManagers;
use App\Models\Comic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

// Tambahkan use statement untuk komponen yang kita gunakan
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor; // Editor teks yang lebih canggih
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ComicResource extends Resource
{
    protected static ?string $model = Comic::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open'; // Ganti ikon agar lebih relevan

    public static function form(Form $form): Form
    {
        // Ini adalah definisi untuk form "Create" dan "Edit"
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul Komik')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(), // Agar lebarnya penuh

                TextInput::make('author')
                    ->label('Penulis')
                    ->required()
                    ->maxLength(100)
                    ->columnSpanFull(), // Agar lebarnya penuh

                Select::make('genre')
                    ->label('Genre')
                    ->multiple()
                    ->options([
                        'Action' => 'Action',
                        'Adventure' => 'Adventure',
                        'Comedy' => 'Comedy',
                        'Drama' => 'Drama',
                        'Fantasy' => 'Fantasy',
                        'Romance' => 'Romance',
                        'Slice of Life' => 'Slice of Life',
                        'Horror' => 'Horror',
                        'Sci-Fi' => 'Sci-Fi',
                        // Tambahkan genre lain sesuai kebutuhan
                    ])
                    ->required()
                    ->columnSpanFull(), // Agar lebarnya penuh

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'Ongoing' => 'Ongoing',
                        'Completed' => 'Completed',
                        'Hiatus' => 'Hiatus',
                    ])
                    ->required(),

                FileUpload::make('thumbnail')
                    ->label('Gambar Sampul (Thumbnail)')
                    ->image() // Hanya menerima file gambar
                    ->directory('thumbnails') // Simpan di folder storage/app/public/thumbnails
                    ->imageEditor(), // Opsional: menambahkan editor gambar bawaan

                RichEditor::make('sinopsis')
                    ->label('Sinopsis')
                    ->required()
                    ->columnSpanFull(), // Agar lebarnya penuh
            ]);
    }

    public static function table(Table $table): Table
    {
        // Ini adalah definisi untuk tampilan tabel data
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->label('Sampul')
                    ->disk('public') // <-- TAMBAHKAN INI
                    ->width(80)
                    ->height(120),

                TextColumn::make('title')
                    ->label('Judul Komik')
                    ->searchable() // Membuat kolom ini bisa dicari
                    ->sortable(),

                TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('genre')
                    ->label('Genre')
                    ->formatStateUsing(fn($state) => is_array($state) ? implode(', ', $state) : $state)
                    ->badge()
                    ->searchable(),

                TextColumn::make('status')
                    ->badge() // Menampilkan status sebagai "badge" agar lebih menarik
                    ->color(fn(string $state): string => match ($state) {
                        'Ongoing' => 'warning',
                        'Completed' => 'success',
                        'Hiatus' => 'danger',
                    }),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Bisa disembunyikan
            ])
            ->filters([
                // Nanti bisa ditambahkan filter di sini
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambahkan baris ini untuk tombol hapus per komik
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ChaptersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComics::route('/'),
            'create' => Pages\CreateComic::route('/create'),
            'edit' => Pages\EditComic::route('/{record}/edit'),
        ];
    }
}
