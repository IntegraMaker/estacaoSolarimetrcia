<?php

namespace App\Imports;

use App\Models\SolarimentriaDados;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SolarimentriaDadosImport implements ToModel,  WithStartRow
{
    /**
     * Definir a linha de partida da importação
     */
    public function startRow():int
    {
        return 5;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $data = $row[0];
        $parsedDate = $this->parseDate($data);
     

        return new SolarimentriaDados([
            'medicao' =>  $parsedDate,
            'velocidade' => $row[1],
            'temperatura' => $row[2],
            'umidade_relativa' => $row[3],
            'precipitacao' => $row[4],
            'irradiacao_solar' => $row[5], // Certifique-se de que o cabeçalho corresponda ao seu arquivo Excel
            
        ]);
    }
    private function parseDate($dateString)
    {

        
        // Tenta fazer o parsing da data usando Carbon
        try {
            // Verifica se a string já contém hora (supondo que a hora tenha ":" como separador)
            if (strpos($dateString, ':') === false) {
                // Se não houver hora, adicionar "00:00:00"
                $dateString .= ' 00:00:00';
            }
          
            return \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $dateString);
        } catch (\Exception $e) {
            // Se houver um erro no parsing, retorne null ou outro tratamento
            return null;
        }
    }
}
