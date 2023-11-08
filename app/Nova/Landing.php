<?php

namespace App\Nova;

use App\Models\MediaCollection;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Hidden;
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

            Hidden::make('lang')->default(function () {
                return app()->getLocale();
            }),

            new Panel('Слайдер', [
                Images::make('Слайдер', MediaCollection::getByCollection(MediaCollection::SLIDER))
                    ->customPropertiesFields([
                        Text::make('Заголовок', 'title'),
                        Text::make('Подзаголовок', 'subtitle'),
                        Textarea::make('Текст', 'description'),
                    ])
            ]),

            new Panel('О нас', [
                Text::make('Заголовок ', 'data->about_us->title'),
                Text::make('Подзаголовок ', 'data->about_us->subtitle'),
                Textarea::make('Текст ', 'data->about_us->description'),
                Files::make('Брошюра', MediaCollection::getByCollection(MediaCollection::BROCHURE)),
            ]),

            new Panel('Список преимуществ', [
                Text::make('Заголовок ', 'data->advantages->title'),
                Text::make('Подзаголовок ', 'data->advantages->subtitle'),
                Images::make('Картинка', MediaCollection::getByCollection(MediaCollection::ADVANTAGE_IMAGE)),

                Images::make('Иконки', MediaCollection::getByCollection(MediaCollection::ADVANTAGES_ICON))
                    ->customPropertiesFields([
                        Text::make('Текст', 'text')->rules('required'),
                    ])
            ]),

            new Panel('Галлерея ', [
                Text::make('Заголовок', 'data->gallery->title'),
                Images::make('Галлерея', MediaCollection::getByCollection(MediaCollection::GALLERY))
            ]),


            new Panel('Планировки ', [
                Images::make('Планировки', MediaCollection::getByCollection(MediaCollection::LAYOUTS))
                    ->customPropertiesFields([
                        Text::make('Кол-во спален', 'bedrooms')->rules('required'),
                        Text::make('Площадь', 'area')->rules('required'),
                        Text::make('Этаж', 'floor')->rules('required'),
                    ])
            ]),

            new Panel('Информация о застройщике ', [
                Text::make('Заголовок ', 'data->builder->title'),
                Text::make('Подзаголовок ', 'data->builder->subtitle'),
                Textarea::make('Описание ', 'data->builder->description'),
                Files::make('Видео', MediaCollection::getByCollection(MediaCollection::BUILDER_VIDEO))
            ]),

            new Panel('План оплат', [
                SimpleRepeatable::make('План оплат', 'data->payment_plan' , [
                    Text::make('Этап', 'step')->rules('required'),
                    Number::make('%', 'percent')->rules('required'),
                    Text::make('Дата', 'date')->rules('required'),
                    Text::make('AED', 'price')->rules('required'),
                ])
            ]),
        ];
    }

    public static function indexQuery(NovaRequest $request, $query): \Illuminate\Database\Eloquent\Builder
    {
        return $query->where('lang', app()->getLocale());
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
