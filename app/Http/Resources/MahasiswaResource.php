<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class MahasiswaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Nim'=>$this->Nim,
            'Nama'=>$this->Nama,
            'Tanngal_Lahir' =>$this->tanggal_lahir,
            'jurusan'=>strtoupper($this->jurusan),
            'No_Handphone' =>$this->no_handphone,
            'Email' =>$this->email,
            'Kelas_id' =>$this->kelas_id
            
        ];
    }
}
