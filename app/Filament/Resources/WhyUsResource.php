<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyUsResource\Pages;
use App\Filament\Resources\WhyUsResource\RelationManagers;
use App\Models\WhyUs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Group;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Support\Enums\Alignment;



class WhyUsResource extends Resource
{
    protected static ?string $model = WhyUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-trending-up';

    protected static ?string $navigationLabel  = 'Why Us';

    protected static ?string $pluralLabel = 'Why Us';


    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Group::make()->schema([

                Section::make('Basic Info')->schema([

                    TextInput::make('why_us_title'),
                    TextInput::make('slug'),
                    Toggle::make('is_visible')
                        ->label('Visible')
                        ->hint('Show in Why Us Page'),
                    Toggle::make('is_featured')
                        ->label('Featured')
                        ->hint('Show in Home Page'),
                ])->columnSpanFull()->collapsible()

            ]),
            Group::make()->schema([

                Section::make('Featured')
                    ->description('Upload Your Featured Image')
                    ->schema([

                    FileUpload::make('why_us_featured_image')
                        ->columnSpan('full'),

                ])->columns(2)->collapsible()

            ]),

            Group::make()->schema([

                Section::make('Why Us Fields')->schema([

                    TextInput::make('why_us_field_1')
                        ->label('Field')
                        ->columnSpanFull(),
                    TextInput::make('why_us_field_2')
                        ->label('Field'),
                    TextInput::make('why_us_field_3')
                        ->label('Field'),

                ])->columns(2)->collapsible()

            ])->columnSpan('full'),
            Group::make()->schema([

                Section::make('Content')->schema([

                    MarkdownEditor::make('why_us_content')
                        ->label('Editor'),

                ])->collapsible()

            ])->columnSpan('full'),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('why_us_title')
                    ->searchable(),
                ImageColumn::make('why_us_featured_image')
                    ->alignment(Alignment::Center)
                    ->toggleable()
                    ->label("Featured")
                    ->circular()
                    ->size(100),
                TextColumn::make('created_at')
                    ->alignment(Alignment::Center)
                    ->since(),
                ToggleColumn::make('is_featured')
                    ->alignment(Alignment::Center),
                ToggleColumn::make('is_visible')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->alignment(Alignment::Center),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListWhyUs::route('/'),
            'create' => Pages\CreateWhyUs::route('/create'),
            'edit' => Pages\EditWhyUs::route('/{record}/edit'),
        ];
    }
}
