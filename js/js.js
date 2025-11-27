 let hamburger=document.getElementById("hamburger");
     let navlink=document.getElementById("nav-link");
     hamburger.addEventListener("click",() => {
        navlink.classList.toggle("active");
        hamburger.classList.toggle("open")
     });

