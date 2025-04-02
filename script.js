document.querySelectorAll("nav a").forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault();  

        const targetId = this.getAttribute("href");  
        const section = document.querySelector(targetId);
        
        if (!section) return;

        const sections = document.querySelectorAll(".slider section");
        const index = [...sections].indexOf(section);

        if (index !== -1) { 
            document.querySelector(".slider").style.transform = 
                'translateX(-${index * 100}vw)';
        }

        section.scrollIntoView({ behavior: "smooth" });
    });
});
