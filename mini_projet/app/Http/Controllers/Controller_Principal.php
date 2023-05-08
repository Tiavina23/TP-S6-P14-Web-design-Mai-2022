<?php

namespace App\Http\Controllers;

use App\Models\Model_Principal;


use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use PDF;
use Hamcrest\Core\HasToString;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
/**
 * Summary of Controller_Principal
 */
class Controller_Principal extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function model(){
        $model=new Model_Principal();
        return $model;
    }

    public function connecter(){

        return view('back_office.login');
    }
    public function aj(){
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        return view('back_office.ajout_contenu',['data'=>$data,'data1'=>$data1]);
    }
    public function logintraitement(){
        $email=request('email');
        $mdp=request('mdp');
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        $liste=$this->model()->paginate_contenu();
        $a= $this->model()->login('admin',$email,$mdp);
        $a1= $this->model()->login('utilisateur',$email,$mdp);
        if(count($a)==1){
           return view('back_office.ajout_contenu',['data'=>$data,'data1'=>$data1]);
        }
        else if(count($a1)==1){
           return view('front_office.actualite',['data'=>$liste,'data1'=>$data,'data2'=>$data1]);

        }
    }
    public function ajout(Request $request){
        $titre=request('titre');
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        if($image!=''){
            $extension = $image->getClientOriginalExtension();
            $imagePath = $image->getPathname();
            $contents = file_get_contents($imagePath);
            $imageData = base64_encode($contents);
        }
        $domaine=request('domaine');
        $secteur=request('secteur');
        $des=request('desc');
        $illustrateur= request('illustrateur');
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
       $this->model()->insert($titre,$imageData,$domaine,$secteur,$des,$illustrateur);
       return view('back_office.ajout_contenu',['data'=>$data,'data1'=>$data1]);
    }


    public function data_contenu(){
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        $liste=$this->model()->paginate_contenu();
        return view('front_office.actualite',['data'=>$liste,'data1'=>$data,'data2'=>$data1]);

    }


    public function search(){
        $val = request('query');
        //echo $val;
        $data1=$this->model()->getdata('domaine');
        $data2=$this->model()->getdata('secteur');
        $data = $this->model()->recherche($val);
        return view('front_office.actualite',['data'=>$data,'data1'=>$data1,'data2'=>$data2]);
    }

    public function update(Request $request)
    {
        $id = request('id_contenu');
        $titre=request('titre');
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('uploads'),$imageName);
        $domaine=request('domaine');
        $secteur=request('secteur');
        $des=request('desc');
        $date_sortie=request('date');
        $illustrateur= request('illustrateur');
        $this->model()->uppdate($id, $titre, $date_sortie, $domaine, $secteur, $des,$image,$illustrateur);
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        return view('back_office.generer_contenu',['data1'=>$data,'data2'=>$data1]);
    }
    public function genere_contenu(){
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        $liste=$this->model()->paginate_contenu();
        return view('back_office.generer_contenu',['data'=>$liste,'data1'=> $data,'data2'=>$data1]);
    }
    public function delete()
    {
        $id = request('id_contenu');
        echo ($id);
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        $liste=$this->model()->paginate_contenu();
        $this->model()->deleteData($id);
        return view('back_office.generer_contenu',['data'=>$liste,'data1'=>$data,'data2'=>$data1]);
    }
    function gen_fiche(){
        $id=request('id_contenu');
        $result=$this->model()->getpub($id);
        $id_contenu=$result[0]->id_contenu;
        $image=$this->model()->getimage($id_contenu);

        $data=[
            'titre'=>$result[0]->titre,
            'date_sortie'=>$result[0]->date_sortie,
            'domaine'=>$result[0]->domaine,
            'secteur'=>$result[0]->secteur,
            'image'=>$result[0]->image,
            'illustrateur'=>$result[0]->illustrateur,
            'description'=>$result[0]->description,
            'image'=>$result[0]->image
        ];
        $data1=$this->model()->getdata('domaine');
        $data2=$this->model()->getdata('secteur');
       return view('front_office.fiche',['images'=>$image,'data'=>$data,'data1'=>$data1,'data2'=>$data2]);
    }
    function gen_sec(){
        $id=request('id_secteur');
        $liste=$this->model()->getdatapub('id_secteur',$id);
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        return view('front_office.actualite',['data'=>$liste,'data1'=>$data,'data2'=>$data1]);

    }
    function gen_dom(){
        $id=request('id_domaine');
        $liste=$this->model()->getdatapub('id_secteur',$id);
        $data=$this->model()->getdata('domaine');
        $data1=$this->model()->getdata('secteur');
        return view('front_office.actualite',['data'=>$liste,'data1'=>$data,'data2'=>$data1]);

    }

}
