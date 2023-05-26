@extends('pdf.layouts')

@section('content')
    <div style="margin-top: 15px">
        <p class="text-center fz-3" style="margin: 0; padding: 0;">FORMULIR</p>
        <h1 class="text-center fz-2" style="margin: 0; padding: 0;">PENDAFTARAN MURID BARU</h1>
        <p class="text-center fz-3" style="margin: 0; padding: 0;">TAHUN PEMBELAJARAN {{ $academic_year->year }}</p>
    </div>
    <table style="width: 100%;margin-top: 25px;">
        <tr>
            <td width="200px">1. NIK</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->nik }}</td>
        </tr>
        <tr>
            <td width="200px">2. Nama</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->fullname }}</td>
        </tr>
        <tr>
            <td width="200px">3. Tempat dan tanggal lahir</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ join(', ', [$studentCandidate->birthplace, date('d m Y', strtotime($studentCandidate->birthdate))]) }}</td>
        </tr>
        <tr>
            <td width="200px">4. Jenis Kelamin</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->gender == \App\Enums\GenderType::Male ? 'Laki - laki' : 'Perempuan' }}</td>
        </tr>
        <tr>
            <td width="200px">5. Agama</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ str($studentCandidate->religion)->ucfirst() }}</td>
        </tr>
        <tr>
            <td width="200px">6. Nama Orang Tua</td>
        </tr>
        <tr>
            <td width="200px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Ayah Kandung
            </td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->father_name }}</td>
        </tr>
        <tr>
            <td width="200px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Ibu Kandung
            </td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->mother_name }}</td>
        </tr>
        <tr>
            <td width="200px">7. Pekerjaan Orang Tua</td>
        </tr>
        <tr>
            <td width="200px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Pekerjaan Ayah
            </td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->father_occupation }}</td>
        </tr>
        <tr>
            <td width="200px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Pekerjaan Ibu
            </td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->mother_occupation }}</td>
        </tr>
        <tr>
            <td width="200px">8. Alamat</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->address }}</td>
        </tr>
        <tr>
            <td width="200px">9. Nama Wali</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->guardian_name ?? '-'}}</td>
        </tr>
        <tr>
            <td width="200px">10. Pekerjaan Wali</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->guardian_occupation ?? '-'}}</td>
        </tr>
        <tr>
            <td width="200px">11. Alamat Wali</td>
            <td>:</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;">{{ $studentCandidate->guardian_address ?? '-'}}</td>
        </tr>
    </table>
    <table style="margin-top: 50px;width: 200px;float: right;">
        <tr>
            <td style="border: none;border-bottom: #000000 dotted 2px;width: 80px;"></td>
            <td>,</td>
            <td style="border: none;border-bottom: #000000 dotted 2px;width: 120px;"></td>
        </tr>
        <tr>
            <td colspan="3">Orang Tua/Wali Murid</td>
        </tr>
        <tr>
            <td style="height: 80px"></td>
        </tr>
        <tr>
            <td colspan="3" style="border: none;border-bottom: #000000 dotted 2px;width: 100%;"></td>
        </tr>
    </table>
@endsection
