<?php

namespace App\Enums;

enum ReligionType: string
{
    case Islam = 'islam';
    case Kristen = 'kristen';
    case Katolik = 'katolik';
    case Hindu = 'hindu';
    case Budha = 'budha';
    case Konghucu = 'konghucu';
    case Etc = 'lainnya';
}
