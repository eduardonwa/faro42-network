const absSlider = function() {
    // Función para mostrar siguiente elemento
    // * action == 1 avanza
    // * action == -1 retrocede
    this.show = (sl, action) => {
        // Solo si es automático
        if(!sl.manual) {
            // Limpiar temporizador para evitar comportamiento no deseado
            clearTimeout(sl.timer);
        }
        // Calcular siguiente movimiento
        let next = sl.index + action;
        // Permitir reproducción infinita
        if(next < 0) {
            next = sl.items.length - 1;
        } else if(next >= sl.items.length) {
            next = 0;
        }
        // ¿Actual sale hacia la izquierda o a la derecha?
        let class1 = (action == 1) ? 'abs-to-left' : 'abs-to-right';
        // ¿Siguiente entra desde izquierda o derecha?
        let class2 = (action == 1) ? 'abs-from-right' : 'abs-from-left';
        // Mover actual y ocultar
        sl.items[sl.index].style.animation = `${class1} ${sl.timing} forwards 0s 1`;
        // Mover siguiente y mostrar
        sl.items[next].style.animation = `${class2} ${sl.timing} forwards 0s 1`;
        // Actualizar índice de elemento actual
        sl.index = next;
        if(!sl.manual) {
            // Avanzar solo si es automático
            sl.timer = setTimeout(this.show, 5000, sl, 1);
        }
    };
    // Obtener todos los contenedores de slider
    this.sliders = document.querySelectorAll('.abs-slider');
    if(this.sliders.length == 0) {
        // No se encontraron sliders, salir
        return;
    }
    // Recorrer sliders para activar
    this.sliders.forEach(sl => {
        // ¿Ya se había activado este slider?
        if(sl.items) {
            // No activar nuevamente
            return;
        }
        // El primer elemento es el que estará activo
        sl.index = 0;
        // Obtener elementos
        sl.items = sl.querySelectorAll(':scope > .abs-slider-container');
        // Obtener botones anterior y siguiente
        sl.buttons = sl.querySelectorAll('.abs-slider-prev, .abs-slider-next');
        // Ocultar botones hasta saber si se deben mostrar
        sl.buttons.forEach(btn => btn.style.display = 'none');
        // Solo si el slider contiene elementos
        if(sl.items) {
            // Obtener tiempo entre elementos
            sl.timing = sl.dataset.timing || '500ms';
            // Posicionar primer elemento
            if(!sl.items[0].style.left) {
                sl.items[0].style.animation = `abs-from-right ${sl.timing} forwards 0s 1`;
            }
            // Si hay más de un elemento
            if(sl.items.length > 1) {
                // Determinar avance automático o manual
                sl.manual = (sl.dataset.manual && sl.dataset.manual == 'true');
                if(!sl.manual) {
                    // Inicializar si es automático
                    sl.timer = setTimeout(this.show, 5000, sl, 1);
                }
                // Mostrar botones anterior / siguiente
                sl.buttons.forEach(btn => btn.style.display = 'block');
                // Asignar evento a botones
                sl.buttons[0].addEventListener('click', () => { this.show(sl, -1); });
                sl.buttons[1].addEventListener('click', () => { this.show(sl, 1); });
            }
        }
    });
};

absSlider();