<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Set;
use Filament\Forms\Get;
use App\Models\Student;

use function Laravel\Prompts\alert;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Select::make('student_id')
                            ->relationship('student', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Datepicker::make('date')
                            ->required(),
                        TextInput::make('number')
                            ->required()
                            ->numeric(),
                        TextInput::make('amount')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->maxValue(4992999949996799992.95)
                            ->hintAction(
                                Action::make('calcularTotalDeItemsVinculadosAlEstudiante')
                                    ->icon('heroicon-m-banknotes')
                                    ->requiresConfirmation()
                                    ->action(function (Get $get, Set $set) {
                                        $student_id = $get('student_id');
                                        $student = Student::query()
                                        ->where('id', $student_id)
                                        ->with('items')
                                        ->first();
                                        $prices = $student->items
                                        ->pluck('price')
                                        ->toArray();
                                        $total = array_sum($prices);
                                        // dd($total);
                                        $set('price', $total);
                                    })
                            ),
                    ]),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Creado')
                            ->content(fn (Payment $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Ultima modificación')
                            ->content(fn (Payment $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Payment $record) => $record === null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('date')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('number')
                    ->sortable()
                    ->searchable()
                    ->numeric(),
                TextColumn::make('amount')
                    ->numeric()
                    ->prefix('$')
                    ->sortable(),

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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
