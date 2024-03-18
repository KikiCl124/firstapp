<?php
include 'Connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark')
    }
</script>
</head>
<style>
body {
            margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-height: 100vh;

        }.edit-main{
            background-color: #c47123 ;
        }.edit-header{
            background-color: red;
        }
        .container{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin-bottom: 100px;
        }
        tr.edit-headeragain{
            background-color: red;
            color:white;
        }        
        .image-container {
            left: 25%;
            margin-top: 225px;
        }        
        .song {
            left: 50%;
        }.navbar {
        position: fixed;
        left: 20px;
        width: 200px;
        z-index: 1;

    }
    </style>    
<body class="bg-gray-500 dark:bg-gray-800">

<div class="navbar">
    <button class="text-white bg-red-300 hover:bg-red-600 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-800 dark:hover:bg-red-900 focus:outline-none dark:focus:ring-red-800" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
        <img src="oi.png" width="50px">
    </button>
 </div>
 
 <!-- drawer component -->
 <div id="drawer-navigation" class="fixed bg-gray-200 top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform -translate-x-full dark:bg-gray-700" tabindex="-1" aria-labelledby="drawer-navigation-label">
     <h5 id="drawer-navigation-label" class="text-base font-semibold text-red-800 uppercase dark:text-red-500">Mahdi CRUD</h5>
     <img src="desin.png" width="200px">
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
         <span class="sr-only">Close menu</span>
     </button>
   <div class="py-4 overflow-y-auto">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="CRUD.php" class="text-decoration-none flex items-center p-2 text-gray-700 rounded-lg dark:text-red-300 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="w-6 h-6 text-gray-800 dark:text-white group-hover:text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
                </svg>
                <span class="ms-3">Tambah Data</span>
                <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">Login</span>
             </a>
          </li>
          <li>
             <a href="#" class="text-decoration-none flex items-center p-2 text-gray-700  rounded-lg dark:text-red-300 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-800 group-hover:text-gray-600 transition duration-75 dark:text-white group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                   <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Guest</span>
             </a>
          </li>
          <li>  
             <a href="View.php" class=" text-decoration-none flex items-center p-2 text-gray-700  rounded-lg dark:text-red-300 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-white group-hover:text-gray-500 dark:group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Admin</span>
             </a>
          </li>
          <li>
             <a href="index.html" class="text-decoration-none flex items-center p-2 text-gray-700 rounded-lg dark:text-red-300 hover:bg-gray-100 dark:hover:bg-gray-700 group">
             <svg class="w-6 h-6 text-gray-800 dark:text-white group-hover:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M19.728 10.686c-2.38 2.256-6.153 3.381-9.875 3.381-3.722 0-7.4-1.126-9.571-3.371L0 10.437V18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-7.6l-.272.286Z"/>
                    <path d="m.135 7.847 1.542 1.417c3.6 3.712 12.747 3.7 16.635.01L19.605 7.9A.98.98 0 0 1 20 7.652V6a2 2 0 0 0-2-2h-3V3a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v1H2a2 2 0 0 0-2 2v1.765c.047.024.092.051.135.082ZM10 10.25a1.25 1.25 0 1 1 0-2.5 1.25 1.25 0 0 1 0 2.5ZM7 3a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1H7V3Z"/>
                </svg>
                <span class="ms-3">Homepage</span>
             </a>
          </li>
          <li>
                <a>
                    <button id="theme-toggle" type="button" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                </a>
          </li>
       </ul>
    </div>
 </div> 
    <div class="image-container">
        <img src="desin.png" alt="Your Image" width="280">
    </div>
    <div class="container"> 
    <table class="table">
  <thead>
    <tr class="edit-main">
      <th scope="col" class="edit-main">No</th>
      <th scope="col" class="edit-main">Profile</th>
      <th scope="col" class="edit-main">Nama</th>
      <th scope="col" class="edit-main">NIK</th>
      <th scope="col" class="edit-main">Nomor</th>
      <th scope="col" class="edit-main">Kelas</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql="SELECT * from crud";
    $result = $testconnection->query($sql);
    $i = 1;

    
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['ID'];
            $profile=$row['profiles'];
            $nama=$row['nama']; 
            $nik=$row['nik'];
            $nomor=$row['nomor'];
            $kelas=$row['kelas'];
            $allowedExtensions = array('gif', 'png', 'jpeg', 'jpg', 'pdf', 'GIF', 'JPG', 'JPEG', 'PNG', '.PDF');
            $fileExtension = pathinfo($profile, PATHINFO_EXTENSION);
            $imagePath = $profile;
            if (!file_exists($imagePath)) {
              $imagePath = 'file_not_found.jpg';
            }
            
            if (in_array($fileExtension, $allowedExtensions)) {
                echo'<tr>
                <th scope="row" class=" dark:bg-gray-600 dark:text-red-500">'.$i++.'</th>
                <td class="bg-gray-400 dark:bg-gray-600 "><img src="'.$profile.'" alt="Profile Image" width="100"></td>
                <td class="bg-gray-400 dark:bg-gray-600 dark:text-red-500">'.$nama.'</td>
                <td class="bg-gray-400 dark:bg-gray-600 dark:text-red-500">'.$nik.'</td>
                <td class="bg-gray-400 dark:bg-gray-600 dark:text-red-500">'.$nomor.'</td>
                <td class="bg-gray-400 dark:bg-gray-600 dark:text-red-500">'.$kelas.'</td>
                </tr>';
            }
        }
    }
    
    ?>
    <script>
function loginAsAdmin() {
    if (confirm("Log in as admin?")) {
        window.location.href = "login.php";
    
    }
}
    function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = "Delete.php?deleteid=" + id;
    }
}
var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
}

var themeToggleBtn = document.getElementById('theme-toggle');

themeToggleBtn.addEventListener('click', function() {

    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }

    // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
    
});
</script>
</script>
</body>
</html>