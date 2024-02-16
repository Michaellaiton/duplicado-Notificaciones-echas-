<script setup>
import { defineProps, computed, ref, onMounted, onUnmounted } from 'vue';

// Define las propiedades que este componente puede recibir.
const props = defineProps({
    align: {
        type: String,
        default: 'right',
    },
    width: {
        type: String,
        default: '48',
    },
    contentClasses: {
        type: Array,
        default: () => ['py-1', 'bg-white'],
    },
});

// Define una referencia para el estado de apertura/cierre del dropdown.
let open = ref(false);

// Función que cierra el dropdown al presionar la tecla 'Escape'.
const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

// Registra/desregistra el evento de tecla 'Escape' al montar/desmontar el componente.
onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

// Calcula la clase de ancho del dropdown en función de la propiedad 'width'.
const widthClass = computed(() => {
    return {
        '48': 'w-48',
    }[props.width.toString()];
});

// Calcula las clases de alineación del dropdown en función de la propiedad 'align'.
const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'origin-top-left left-0';
    }

    if (props.align === 'right') {
        return 'origin-top-right right-0';
    }

    return 'origin-top';
});
</script>

<template>
    <!-- Contenedor principal del dropdown -->
    <div class="relative">
        <!-- Elemento que activa/desactiva el dropdown al hacer clic -->
        <div @click="open = !open">
            <!-- Espacio para personalizar el elemento activador del dropdown -->
            <slot name="trigger" />
        </div>

        <!-- Fondo de pantalla completa para cerrar el dropdown al hacer clic -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false" />

        <!-- Contenido del dropdown con transiciones de entrada/salida -->
        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 mt-2 rounded-md shadow-lg"
                :class="[widthClass, alignmentClasses]"
                style="display: none;"
                @click="open = false"
            >
                <!-- Espacio para personalizar el contenido del dropdown -->
                <div class="rounded-md ring-1 ring-black ring-opacity-5" :class="contentClasses">
                    <slot name="content" />
                </div>








            </div>
        </transition>

    </div>
</template>
