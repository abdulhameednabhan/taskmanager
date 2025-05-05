<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\Text;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\BulkActionGroup;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')->required(),
            TextInput::make('slug')->required(),
            Select::make('theme')
                ->options([
                    'classic' => 'Classic',
                    'modern' => 'Modern',
                ])
                ->required(),
            Repeater::make('sections')
                ->schema([
                    Select::make('type')
                        ->options([
                            'hero' => 'Hero Section',
                            'listing' => 'Listing Section',
                        ])
                        ->required(),
                    TextInput::make('title'),
                    TextInput::make('image'),
                    Textarea::make('description'),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')  // استخدام Text بدلاً من Columns\Text
                    ->label('Title')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('slug')   // استخدام Text بدلاً من Tables\Columns\Text
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('theme')  // استخدام Text بدلاً من Tables\Columns\Text
                    ->label('Theme'),
                    Tables\Columns\TextColumn::make('created_at')  // استخدام Text بدلاً من Tables\Columns\Text
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
