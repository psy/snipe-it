<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>Labels</title>

</head>
<body>
    <style>
        @page {
            sheet-size: 51mm 17mm;
            size: auto;
            overflow: hidden;
        }

        .label {
            clear: both;
            width: 51mm;
            height: 16mm;
            padding: 1mm 2mm 1mm 2mm;
            font-size: 6pt;
            page-break-after: always;
        }

        .label_text {
            max-height: 15mm;
        }

        .label_qr {
            width: 15mm;
            height: 15mm;
            float: left;
        }

        .label_qr .qr_img {
            width: 100%;
            height: 100%;
        }
    </style>

    @foreach ($assets as $asset)
    <div class="label">
        <div class="label_qr">
            <img src="/qr/{{ $asset->id }}/qr_code" class="qr_img">
        </div>
        @if ($settings->qr_text!='')
        <div class="label_title">
            <strong>{{ $settings->qr_text }}</strong>
        </div>
        @endif
        <div class="label_text">
            @if (($settings->labels_display_company_name=='1') && ($asset->company))
                <span>C: {{ $asset->company->name }}</span><br />
            @endif
            @if (($settings->labels_display_name=='1') && ($asset->name!=''))
                <span>N: {{ $asset->name }}</span><br />
            @endif
            @if (($settings->labels_display_tag=='1') && ($asset->asset_tag!=''))
                 <span>T: {{ $asset->asset_tag }}</span><br />
            @endif
            @if (($settings->labels_display_serial=='1') && ($asset->serial!=''))
                <span>S: {{ $asset->serial }}</span><br />
            @endif
        </div>
    </div>
    @endforeach
</body>
</html>
