<h1>Bàn cờ vua {{ $n }} x {{ $n }}</h1>

<table border="1" cellspacing="0">
@for ($i = 0; $i < $n; $i++)
    <tr>
    @for ($j = 0; $j < $n; $j++)
        <td width="40" height="40"
            style="background: {{ ($i + $j) % 2 == 0 ? '#fff' : '#000' }}">
        </td>
    @endfor
    </tr>
@endfor
</table>
