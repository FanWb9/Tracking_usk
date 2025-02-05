<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackingResource\Pages;
use App\Filament\Resources\TrackingResource\RelationManagers;
use App\Models\Tracking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackingResource extends Resource
{
    protected static ?string $model = Tracking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
               ->schema([
                Forms\Components\TextInput::make('Nama_barang')
                ->label('Nama Barang')
                ->placeholder('Masukin Nama Barang')
                ->required(),
            Forms\Components\TextInput::make('No_resi')
                ->label('Nomer Resi')
                ->placeholder('Masukan Nomor Resi')
                ->required(),
            Forms\Components\Select::make('status')
                ->label('Pilih Status')
                ->options([
                    'Done' => 'Done',
                    'Proses' => 'Proses',
                    'Pending' => 'Pending',
                ])
                ->required(),
            Forms\Components\TextInput::make('quantity')
                ->label('Jumlah barang')
                ->placeholder('Jumlah barang')
                ->required(),
            Forms\Components\TextInput::make('location')
                ->label('Alamat Pesanan')
                ->required(),
               ])
                           
            ]);
    }

    public static function table(Table $table): Table
    {   
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('Nama_barang')->label('Nama Barang')->searchable(),
                Tables\Columns\TextColumn::make('No_resi')->label('No Resi'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('location'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrackings::route('/'),
            'create' => Pages\CreateTracking::route('/create'),
            'edit' => Pages\EditTracking::route('/{record}/edit'),
        ];
    }
}
