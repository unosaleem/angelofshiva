document.querySelectorAll('.tab-btn').forEach(btn=>{
    btn.onclick=()=>{
        document.querySelectorAll('.tab-content').forEach(t=>t.classList.add('hidden'));
        document.getElementById(btn.dataset.tab).classList.remove('hidden');
    }
});
