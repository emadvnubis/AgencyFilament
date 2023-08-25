<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;



class HomepagSettings extends Page
{


    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.homepag-settings';

    protected static ?string $title = 'Home Page Settings';

    protected static ?string $navigationLabel = 'Home Page';

    protected static ?string $slug = 'homepage';

    protected ?string $heading = 'Settings';

    protected ?string $subheading = 'Custom Page Subheading';


    protected static ?int $navigationSort = 1;



}
