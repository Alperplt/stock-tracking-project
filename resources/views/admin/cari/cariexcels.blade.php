<table style="border-collapse: collapse;border-spacing: 0;width: 100%;">
    <tr>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">carikodu</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">cariadi</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">carigrubu</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">tcno</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">vergino</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">ticariunvan</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">adres</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">telefon</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">email</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">image</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">ozelkod</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">durum</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">carigrubuno</th>
    </tr>
    @foreach($cariexcels as $crexcel)
        <tr>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $crexcel->carikodu }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->cariadi }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{@\App\Models\Carigrubu::grpnames($crexcel->carigrubu)}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $crexcel->tcno }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->vergino }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->ticariunvan }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->adres }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->telefon }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->email }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->image }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->ozelkod }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $crexcel->durum }}</td>

            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $crexcel->carigrubu}}</td>

        </tr>
    @endforeach
</table>