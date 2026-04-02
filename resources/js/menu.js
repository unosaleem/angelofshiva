document.querySelectorAll('.menu-toggle').forEach(btn=>{
    btn.onclick=()=>{
        const t=document.getElementById(btn.dataset.target);
        document.querySelectorAll('.submenu').forEach(m=>{
            if(m!==t) m.classList.add('hidden');
        });
        t.classList.toggle('hidden');
    }
});
