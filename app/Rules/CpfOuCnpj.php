<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfOuCnpj implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $value = preg_replace('/[^0-9]/', '', $value);

        if (strlen($value) === 11 && $this->validarCpf($value)) {
            return;
        }

        if (strlen($value) === 14 && $this->validarCnpj($value)) {
            return;
        }

        $fail('O :attribute deve ser um CPF ou CNPJ válido.');
    }

    private function validarCpf($cpf)
    {
        if (preg_match('/(\d)\1{10}/', $cpf)) return false;

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) return false;
        }

        return true;
    }

    private function validarCnpj($cnpj)
    {
        if (preg_match('/(\d)\1{13}/', $cnpj)) return false;

        $t = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
        for ($s = 0, $i = 0; $i < 12; $i++) $s += $cnpj[$i] * $t[$i];
        $d1 = ($s % 11 < 2) ? 0 : 11 - ($s % 11);

        $t = [6] + $t;
        for ($s = 0, $i = 0; $i < 13; $i++) $s += $cnpj[$i] * $t[$i];
        $d2 = ($s % 11 < 2) ? 0 : 11 - ($s % 11);

        return $cnpj[12] == $d1 && $cnpj[13] == $d2;
    }
}
