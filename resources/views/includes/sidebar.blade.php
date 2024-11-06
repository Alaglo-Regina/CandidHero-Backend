@extends('layout.base')

@section('title', 'dashboardAdmin')

@section('name')
    <aside class="sidebar">
     <div class="side-header">
         <img src="../assets/Images/tof2.png" alt="profil" />
         <h2>CodingClassic</h2>
     </div>
     <table class="sidebar-links">
         <h4>
             <span>Main Menu</span>
             <div class="menu-separator"></div>
         </h4>

         <tr>
             <td class="gestion">
                 <li>
                     <a href="">
                        
                         <img src="../assets/icons/home.svg" alt="home" class="icon" />
                         Gestion des offres
                     </a>
                 </li>
             </td>
             <td class="hidden">
                 <li>
                     <a href="">
                         Liste des offres
                     </a>
                 </li>
                 <li>
                     <a href="">
                         Ajouter une offre
                     </a>
                 </li>
                 <li>
                     <a href="">
                         Offres actuelles
                     </a>
                 </li>
             </td>
         </tr>
         <tr>
             <td class="gestion">
                 <li>
                     <a href="">
                         <img src="../assets/icons/home.svg" alt="home" class="icon" />
                         Gestion recruteur
                     </a>
                 </li>
             </td>
             <td class="hidden">
                 <li>
                     <a href="">
                         Liste recruteurs
                     </a>
                 </li>
                 <li>
                     <a href="">
                         Ajouter recruteur
                     </a>
                 </li>
             </td>
         </tr>
         <tr>
             <td class="gestion">
                 <li>
                     <a href="">
                         <img src="../assets/icons/home.svg" alt="home" class="icon" />
                         Gestion candidats
                     </a>
                 </li>
             </td>
             <td class="hidden">
                 <li>
                     <a href="">
                         Liste candidats
                     </a>
                 </li>
                 <li>
                     <a href="">
                         Ajouter candidat
                     </a>
                 </li>
             </td>
         </tr>
         <tr>
             <td>
                 <h4>
                     <span>Account</span>
                     <div class="menu-separator"></div>
                 </h4>
             </td>
             <td>
                 <li>
                     <a href="#">
                         <img src="../assets/icons/home.svg" alt="home" class="icon" />
                         Profil
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <img src="../assets/icons/home.svg" alt="home" class="icon" />
                         Notifications
                     </a>
                 </li>
                 <li>
                     <a href="#">
                         <img src="../assets/icons/home.svg" alt="home" class="icon" />
                         Logout
                     </a>
                 </li>
             </td>
         </tr>
     </table>
     <div class="user-account">
         <div class="user-profile">
             <img
                 src="../assets/Images/WhatsApp Image 2024-02-16 at 08.47.40.jpeg"
                 alt="profile" />
             <div class="user-detail">
                 <h3>Regina ALAGLO</h3>
                 <span>Web developper</span>
             </div>
         </div>
     </div>
</aside>
@endsection
