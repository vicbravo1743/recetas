<template>
    <input 
        type="submit" 
        class="btn btn-danger d-block w-100" 
        value="Eliminar ×"
       @click="eliminarReceta"
    />
</template>

<script>
    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta(){
                this.$swal({
                        title: '¿Deseas eliminar esta receta?',
                        text: "Una vez eliminada, no se puede recuperar!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const params = {
                                id: this.recetaId
                            };

                            axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                                .then(respuesta => {
                                    this.$swal(
                                        'Receta eliminada!',
                                        'Se elimino correctamente.',
                                        'success'
                                    )

                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode)
                                })
                                .catch(error => {
                                    console.log(error)
                                })

                            this.$swal(
                                'Receta eliminada!',
                                'Se elimino correctamente.',
                                'success'
                            )
                        }
                })
            }
        }
    }
</script>