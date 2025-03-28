<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thẻ Môn Sinh - {{ $master->full_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
            .print-only {
                display: block;
            }
            body {
                margin: 0;
                padding: 0;
                background: white;
            }
            .card-container {
                padding: 0;
                margin: 0;
            }
        }
        .print-only {
            display: none;
        }
        .card {
            width: 85.6mm;
            height: 54mm;
            padding: 2mm;
            border: 1px solid #ccc;
            border-radius: 3mm;
            position: relative;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-header {
            text-align: center;
            font-weight: bold;
            font-size: 3mm;
            margin-bottom: 1mm;
            color: #1a1a1a;
            border-bottom: 1px solid #eee;
            padding-bottom: 1mm;
        }
        .card-body {
            display: flex;
            gap: 2mm;
            margin-top: 1mm;
        }
        .card-photo {
            width: 20mm;
            height: 25mm;
            border: 1px solid #ddd;
            overflow: hidden;
            border-radius: 1mm;
        }
        .card-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .card-info {
            flex: 1;
            font-size: 2.5mm;
        }
        .card-info p {
            margin: 0.5mm 0;
            line-height: 1.2;
        }
        .card-info strong {
            color: #4a5568;
        }
        .card-footer {
            text-align: center;
            font-size: 2mm;
            margin-top: 1mm;
            border-top: 1px solid #eee;
            padding-top: 1mm;
            color: #4a5568;
        }
        .card-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
            background: #f7fafc;
        }
        .print-button {
            position: fixed;
            top: 1rem;
            right: 1rem;
            background: #FFC107;
            color: #1a1a1a;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .print-button:hover {
            background: #e6ae00;
        }
    </style>
</head>
<body>
    <button onclick="window.print()" class="print-button no-print">
        In Thẻ
    </button>

    <div class="card-container">
        <div class="card">
            <div class="card-header">
                VOVINAM VIỆT VÕ ĐẠO
            </div>
            <div class="card-body">
                <div class="card-photo">
                    @if($master->getFirstMediaUrl())
                        <img src="{{ $master->getFirstMediaUrl() }}" alt="Photo">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 text-xs">No Photo</span>
                        </div>
                    @endif
                </div>
                <div class="card-info">
                    <p><strong>Họ và tên:</strong> {{ $master->full_name }}</p>
                    <p><strong>Đai:</strong> {{ $master->rank->name ?? 'Chưa có' }}</p>
                    <p><strong>Mã số:</strong> {{ $master->code }}</p>
                    <p><strong>Ngày sinh:</strong> {{ $master->dob ? $master->dob->format('d/m/Y') : 'N/A' }}</p>
                </div>
            </div>
            <div class="card-footer">
                {{ $master->company->name ?? 'Chi nhánh chưa cập nhật' }}
            </div>
        </div>
    </div>

    <div class="print-only mt-4 text-center text-sm text-gray-500">
        <p>Vui lòng cắt theo đường viền của thẻ</p>
        <p>Kích thước thẻ: 85.6mm x 54mm</p>
    </div>
</body>
</html> 