<?php

namespace App\Nova;

use App\Models\MediaCollection;
use Ebess\AdvancedNovaMediaLibrary\Fields\Files;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Email;
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
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
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
                Files::make('Favicon', MediaCollection::getByCollection(MediaCollection::FAVICON)),
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
                    ->hideFromIndex()
            ]),

            new Panel('О нас', [
                Text::make('Заголовок ', 'data->about_us->title')
                    ->hideFromIndex(),
                Text::make('Подзаголовок ', 'data->about_us->subtitle')
                    ->hideFromIndex(),
                Textarea::make('Текст ', 'data->about_us->description')
                    ->hideFromIndex(),
                Files::make('Брошюра', MediaCollection::getByCollection(MediaCollection::BROCHURE))
                    ->hideFromIndex(),
            ]),

            new Panel('Список преимуществ', [
                Text::make('Заголовок ', 'data->advantages->title')
                    ->hideFromIndex(),
                Text::make('Подзаголовок ', 'data->advantages->subtitle')
                    ->hideFromIndex(),
                Images::make('Картинка', MediaCollection::getByCollection(MediaCollection::ADVANTAGE_IMAGE))
                    ->hideFromIndex(),

                Images::make('Иконки', MediaCollection::getByCollection(MediaCollection::ADVANTAGES_ICON))
                    ->customPropertiesFields([
                        Text::make('Текст', 'text')->rules('required'),
                    ])
                    ->hideFromIndex()
            ]),

            new Panel('Галлерея ', [
                Text::make('Заголовок', 'data->gallery->title')->hideFromIndex(),
                Images::make('Галлерея', MediaCollection::getByCollection(MediaCollection::GALLERY))->hideFromIndex()
            ]),


            new Panel('Планировки ', [
                Images::make('Планировки', MediaCollection::getByCollection(MediaCollection::LAYOUTS))
                    ->customPropertiesFields([
                        Text::make('Кол-во спален', 'bedrooms')->rules('required'),
                        Text::make('Площадь', 'area')->rules('required'),
                        Text::make('Этаж', 'floor')->rules('required'),
                    ])
                    ->hideFromIndex()
            ]),

            new Panel('Информация о застройщике ', [
                Text::make('Заголовок ', 'data->builder->title')
                    ->hideFromIndex(),
                Text::make('Подзаголовок ', 'data->builder->subtitle')
                    ->hideFromIndex(),
                Textarea::make('Описание ', 'data->builder->description')
                    ->hideFromIndex(),
                Files::make('Видео', MediaCollection::getByCollection(MediaCollection::BUILDER_VIDEO))
                    ->hideFromIndex()
            ]),

            new Panel('План оплат', [
                SimpleRepeatable::make('План оплат', 'data->payment_plan', [
                    Text::make('Этап', 'step')->rules('required')
                        ->hideFromIndex(),
                    Number::make('%', 'percent')->rules('required')
                        ->hideFromIndex(),
                    Text::make('Дата', 'date')->rules('required')
                        ->hideFromIndex(),
                    Text::make('AED', 'price')->rules('required')
                        ->hideFromIndex(),
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
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
