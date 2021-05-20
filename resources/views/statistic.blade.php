
<h1>{{ $header }}</h1>

<p>{{ $message }}</p>

<table class="highscore">
  <tr>
    <th>Bonus</th>
    <th>Yatzy</th>
    <th>Score</th>
  </tr>
  @foreach ($result as $res)
  <tr>
    @if ($res->bonus == 50)
    <td>YES</td>
    @else
    <td>NO</td>
    @endif
    @if ($res->yatzy == 50)
    <td>YES</td>
    @else
    <td>NO</td>
    @endif
    <td>{{ $res->total }}</td>
  </tr>
@endforeach
</table>
