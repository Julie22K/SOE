let list = document.querySelectorAll('td.daymenu');

        function activation() {
            this.classList.add('active');
        }

        function deactivation() {
            this.classList.remove('active');
        }
        list.forEach((item) =>
            item.addEventListener('click', activation));
        list.forEach((item) =>
            item.addEventListener('dblclick', deactivation));