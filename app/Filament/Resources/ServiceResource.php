<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\Group;
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
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Support\Enums\Alignment;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-fire';

    //protected static ?string $navigationGroup = 'Shop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([

                    Section::make('Basic Info')->schema([

                        TextInput::make('service_title')
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->columnSpanFull(),
                        Toggle::make('is_visible')
                            ->label('Visible')
                            ->hint('Show in Services Page'),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->hint('Show in Home Page'),
                    ])->columns(2)->collapsible()

                ]),
                Group::make()->schema([

                    Section::make('Featured')->schema([
                        FileUpload::make('service_image')
                            ->columnSpan('full'),
                    ])->columns(2)->collapsible()

                ]),
                Group::make()->schema([

                    Section::make('Custom Fields')->schema([

                        TextInput::make('custom_field_1')
                            ->label('Field')
                            ->columnSpanFull(),
                        TextInput::make('custom_field_2')
                            ->label('Field'),
                        TextInput::make('custom_field_3')
                            ->label('Field'),

                    ])->columns(2)->collapsible()

                ])->columnSpan('full'),
                Group::make()->schema([

                    Section::make('Content')->schema([

                        MarkdownEditor::make('service_content')
                            ->label('Editor'),

                    ])->collapsible()

                ])->columnSpan('full'),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('service_title')
                ->searchable(),
                ImageColumn::make('service_image')
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
