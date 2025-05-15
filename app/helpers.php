<?php
use Illuminate\Support\Facades\DB;
function admin_assets(){
    $path = url('public/admin_assets');
   return $path;
}
function website_assets(){
    $path = url('public/website_assets/assets');
   return $path;
}
function invoice_assets(){
    $path = url('public/invoice_asstes');
   return $path;
}
function login_assets(){
    $path = url('public/login_assets');
   return $path;
}
function image_path(){
    $path = url('storage/app/public/');
   return $path;
}
function p($data){
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    die();
}
function get_designation($id){
    $result = DB::table('mr_designation')->where(['id'=>$id])->first();
    if($result){
         return $result->name;
    }else{
        return  '';
    }

}
function get_category($id){
    $result = DB::table('consumable_category')->where(['id'=>$id])->first();
    if($result){
         return $result->name;
    }else{
        return  '';
    }

}
function get_medicine_category($id){
    $result = DB::table('medicine_categories')->where(['id'=>$id])->first();
    if($result){
         return $result->name;
    }else{
        return  '';
    }

}

?>
