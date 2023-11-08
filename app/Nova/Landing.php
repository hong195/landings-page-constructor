<?php

namespace App\Nova;

use App\Models\MediaCollection;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;

class Landing extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Landing>
     */
    public static $model = \App\Models\Landing::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            new Panel('Основная информация', [
                Text::make('Название', 'name')->rules('required'),
                Text::make('Домен', 'domain')->rules('required'),
                Email::make('Адрес электронной почты', 'data->email')->rules('required'),
                Text::make('Телефон', 'data->phone')->rules('required'),
            ]),

            new Panel('Слайдер', [
                Images::make('Слайдер', MediaCollection::SLIDER->value)
                    ->customPropertiesFields([
                        Text::make('Заголовок ', 'title'),
                        Text::make('Подзаголовок ', 'subtitle'),
                        Textarea::make('Текст ', 'description'),
                    ])
            ]),

            new Panel('О нас', [
                Text::make('Заголовок ', 'data->about_us->title'),
                Text::make('Подзаголовок ', 'data->about_us->subtitle'),
                Textarea::make('Текст ', 'data->about_us->description'),
                File::make('Брошюра', 'data->about_us->file')->disk('public'),
            ]),

            new Panel('Список преимуществ', [
                Text::make('Заголовок ', 'data->advantages->title'),
                Text::make('Подзаголовок ', 'data->advantages->subtitle'),
                Images::make('Картинка', MediaCollection::ADVANTAGE_IMAGE->value),

                Images::make('Иконки', MediaCollection::ADVANTAGES_ICON->value)
                    ->customPropertiesFields([
                        Text::make('Текст', 'text'),
                    ])
            ]),

            new Panel('Галлерея ', [
                Images::make('Галлерея', MediaCollection::GALLERY->value)
            ]),


            new Panel('Планировки ', [
                Images::make('Планировки', MediaCollection::LAYOUTS->value)
                    ->customPropertiesFields([
                        Text::make('Кол-во спален', 'data->bedrooms'),
                        Text::make('Площадь', 'data->area'),
                        Text::make('Этаж', 'data->floor'),
                    ])
            ]),

            new Panel('Информация о застройщике ', [
                Text::make('Заголовок ', 'data->builder->title'),
                Text::make('Подзаголовок ', 'data->builder->subtitle'),
                Textarea::make('Описание ', 'data->builder->subtitle'),
                Images::make('Видео', MediaCollection::BUILDER_VIDEO->value)
            ]),

            new Panel('План оплат', [
                SimpleRepeatable::make('План оплат', 'data->payment_plan' , [
                    Text::make('Этап', 'step'),
                    Number::make('%', 'percent'),
                    Text::make('Дата', 'date'),
                    Text::make('AED', 'price'),
                ])
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
