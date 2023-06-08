<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>

    <div class="container">
        <h1 class="text-center my-4">Treni in partenza</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Azienda</th>
                <th scope="col">Città di partenza</th>
                <th scope="col">Orario di partenza</th>
                <th scope="col">Città di arrivo</th>
                <th scope="col">Orario di arrivo</th>
                <th scope="col">Codice treno</th>
                <th scope="col">Numero di carrozze</th>
                <th scope="col">In ritardo</th>
                <th scope="col">Cancellato</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    <tr>
                    <th scope="row">{{ strtoupper($train->company) }}</th>
                    <td>{{ $train->departure_city }}</td>
                    <td>{{ $train->departure_time }}</td>
                    <td>{{ $train->arrival_city }}</td>
                    <td>{{ $train->arrival_time }}</td>
                    <td>{{ $train->train_code }}</td>
                    <td>{{ $train->train_car }}</td>
                    <td>
                        @if (!$train->cancelled && !$train->on_time)
                            &check;
                        @endif
                    </td>
                    <td>
                        @if ($train->cancelled)
                            &check;
                        @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

</body>

</html>
