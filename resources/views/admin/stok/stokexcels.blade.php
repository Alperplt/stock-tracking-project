<table style="border-collapse: collapse;border-spacing: 0;width: 100%;">
    <tr>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">stokkodu</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">stokadi</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">barkodu</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">grubadi</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">altgrubadi</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">markaadi</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">alisfiyati</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">perakendesatis</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">vadelisatis</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">kdvalis</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">kdvsatisprk</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">kdvsatistptn</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">indirim</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">miktar</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">birimadi</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">aciklama</th>

        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">ozelkod</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">durum</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">resim</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">grubu</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">altgrubu</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">marka</th>
        <th style="background-color: #3166ff;color: #ffffff;text-align: center;vertical-align: top">birimi</th>
        

    </tr>
    @foreach($stokexcels as $stexcel)
        <tr>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $stexcel->stokkodu }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $stexcel->stokadi }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ $stexcel->barkodu }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{@\App\Models\Stokgrup::grpnames($stexcel->grubu)}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{@\App\Models\Altgrup::grpnames($stexcel->altgrubu)}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 200px; text-align:center;">{{ @\App\Models\Marka::brmnames($stexcel->marka) }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 150px; text-align:center;">{{$stexcel->alisfiyati}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 150px; text-align:center;">{{$stexcel->perakendesatis}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 150px; text-align:center;">{{$stexcel->vadelisatis}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 80px; text-align:center;">{{ $stexcel->kdvalis }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 80px; text-align:center;">{{ $stexcel->kdvsatisprk }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 80px; text-align:center;">{{ $stexcel->kdvsatistptn }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 80px; text-align:center;">{{ $stexcel->indirim }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ @App\Models\Depohareket::sumHr($stexcel->id) }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{@\App\Models\Stokbirim::brmnames($stexcel->birimi)}}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $stexcel->ozelkod }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 30px; text-align:center;">{{ $stexcel->durum }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 170px; text-align:center;">{{ $stexcel->resim }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 170px; text-align:center;">{{ $stexcel->aciklama }}</td>

            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $stexcel->grubu }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 100px; text-align:center;">{{ $stexcel->altgrubu }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 80px; text-align:center;">{{ $stexcel->marka }}</td>
            <td style="padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;width: 170px; text-align:center;">{{ $stexcel->birimi }}</td>
        </tr>
    @endforeach
</table>