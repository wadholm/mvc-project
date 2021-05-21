<div class="container">

<h1>{{ $header }}</h1>

<p>{{ $message }}</p>

<table class="highscore">
  <tr>
    <th>Name</th>
    <th>Score</th>
    <th>Date</th>
  </tr>
  @foreach ($result as $res)
<tr>
    <td>{{ $res->name }}</td>
    <td>{{ $res->score }}</td>
    @if ($res->created_at != null)
    <td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($res->created_at))->format('Y-m-d')}}</td>
    @else
    <td>-</td>
    @endif

  </tr>
@endforeach
</table>
</div>
