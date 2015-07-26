# MaterializeCSS Laravel Pagination Presenter

---

### Installation
```
composer require phillippohlandt/materializecss-laravel-pagination
```

---

### Usage
```
{!! with(new Ohlandt\Presenters\Pagination\Materialize($paginator))->render() !!}
```

##### With custom color

```
{!! with((new Ohlandt\Presenters\Pagination\Materialize($paginator))->setColor('lime darken-1'))->render() !!}
```
