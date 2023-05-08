<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Model_Principal extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public function login($table,$email, $password){
        $data= DB::table($table)
                ->where('email','=',$email)
                ->where('password','=',$password)
                ->get();
        return $data;
    }
    public function getdata($table){

        return DB::table($table)->get();
    }
    public function insert($titre,$image,$domaine,$secteur,$descr,$illustrateur){
        return DB::insert('insert into contenu(titre,id_domaine,id_secteur,description,image,illustrateur) values(?,?,?,?,?,?)', [$titre, $domaine, $secteur, $descr,$image,$illustrateur]);
    }
    function paginate_contenu($perPage = 10)
    {
        return  DB::table('pub')->simplepaginate($perPage);
    }
    public function recherche($keyword)
    {
        $motsCles = explode(" ", $keyword);
        $query = DB::table('pub')
            ->where(function ($q) use ($motsCles) {
                foreach ($motsCles as $motCle) {
                    $q->orWhere('titre','like','%'.$motCle.'%')
                      ->orWhere('date_sortie','like','%'.$motCle.'%')
                      ->orWhere('secteur','like','%'.$motCle.'%')
                      ->orWhere('domaine','like','%'.$motCle.'%');
                }
            });

        $results = $query->get();
        $results = $query->simplepaginate(10);
        return $results;
    }
    function getpub($crypt_id){
            $data=DB::select("select * from pub where md5(id_contenu::text)='".$crypt_id."'");
            return $data;
    }
    public function inserte($text){

        $res =DB::select("insert into test values (E'".$text."')");
        return $res;
    }
    public function getimage($id_contenu){
        $data= DB::table('contenu_image')
        ->where('id_contenu','=',$id_contenu)
        ->get();
    return $data;
    }
    public function getdatapub($colone,$id){
        $data = DB::table('pub')
            ->whereRaw('md5('.$colone.'::text) = ?', [$id])
            ->paginate(10);
            return $data;
    }

    public function uppdate($id, $titre, $date_sortie, $domaine, $secteur, $des,$image,$illustrateur)
    {
        return DB::table('contenu')
            ->where('id_contenu', '=', $id)
            ->update(['titre' => $titre, 'date_sortie' => $date_sortie, 'id_domaine' => $domaine, 'id_secteur' => $secteur, 'descriptioon' => $des,'image'=>$image,'illustrateur'=>$illustrateur]);
    }

    public function deleteData($id)
    {
        DB::table('contenu')->whereRaw('md5(cast(id_contenu as text)) = ?', [$id])->delete();

        return redirect()->back()->with('success', 'L\'enregistrement a été supprimé avec succès.');
    }

}
