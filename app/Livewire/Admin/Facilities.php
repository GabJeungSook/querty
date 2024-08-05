<?php

namespace App\Livewire\Admin;

use App\Models\Facility;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;

class Facilities extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
        ->query(Facility::query())
        ->columns([
            TextColumn::make('name')
            ->searchable(),
            TextColumn::make('address')
            ->searchable(),
        ])
        ->headerActions([
            CreateAction::make()
                ->model(User::class)
                ->label('Add User')
                ->modalHeading('Add User')
                ->form([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                ])
        ]);
    }

    public function render()
    {
        return view('livewire.admin.facilities');
    }
}
