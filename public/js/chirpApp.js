


var app = angular.module('chirpApp', ['ngRoute', 'ngResource']).run(function($rootScope) {
        $rootScope.inicializarJSON = function(){
                //console.log('inicializarJSON')
                fetch('js/proyectos_realizados_luis.json')
                .then(response => response.json())
                .then(data =>{
                        //console.log(data)
                        $rootScope.proyectos_realizados_luis =  data;
                });
                fetch('js/contactos.json')
                .then(response => response.json())
                .then(data =>{
                        //console.log(data)
                        $rootScope.contactos =  data;
                });
                fetch('js/cursos.json')
                .then(response => response.json())
                .then(data =>{
                        //console.log(data)
                        $rootScope.cursos =  data;
                });
                
        };
});

app.controller('myCtrl', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.descripcion_p = {
            titulo:"Proyectos",
            descripcion:"Los siguientes proyectos fueron desarrollados"
        };
        $scope.proyectos = proyectosjs;
});

app.config(function($routeProvider){
        //funcionara cuando se trabaje con un servidor express, django
	//$routeProvider.html5Mode(true);
        
        $routeProvider
		//the timeline display
		.when('/', {
			templateUrl: 'template/main.html',
			controller: 'mainController'
		})
		//the contacto luis display
		.when('/contacto_luis', {
			templateUrl: 'template/contacto_luis.html',
			controller: 'contactoLuisController'
		})
		//the contacto percy display
		.when('/contacto_percy', {
			templateUrl: 'template/contacto_percy.html',
			controller: 'contactoPercyController'
        })
        //the contacto juan display
		.when('/contacto_juan', {
			templateUrl: 'template/contacto_juan.html',
			controller: 'contactoJuanController'
		})
        //the contacto empresa
	.when('/contacto_empresa', {
			templateUrl: 'template/contacto_empresa.html',
			controller: 'contactoEmpresaController'
		})
        .when('/agencia_empresas', {
                templateUrl: 'template/agencia_empresas.html',
                controller: 'agenciaEmpresasController'
        })
        .when('/agencia_profesionales', {
                templateUrl: 'template/agencia_profesionales.html',
                controller: 'agenciaProfesionalesController'
        }).when('/agencia_emprendedores', {
                templateUrl: 'template/agencia_emprendedores.html',
                controller: 'agenciaEmprendedoresController'
        }).when('/emprender', {
                templateUrl: 'template/emprender_internet.html',
                controller: 'emprenderInternetController'
        }).when('/contacto_yolanda', {
                templateUrl: 'template/contacto_yolanda.html',
                controller: 'contactoYolandaController'
        }).when('/contacto_patricia', {
                templateUrl: 'template/contacto_patricia.html',
                controller: 'contactoPatriciaController'
        }).when('/contacto_ana', {
                templateUrl: 'template/contacto_ana.html',
                controller: 'contactoAnaController'
        })
        
        
        
});

app.factory('postService', function($resource){
	return $resource('/api/posts/:id');
});

app.controller('contactoLuisController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        //$scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.experiencia_luis = experiencia_luisjs;

        $scope.inicializarJSON = function(){
                //console.log('inicializarJSON')
                fetch('js/proyectos_realizados_luis.json')
                .then(response => response.json())
                .then(data =>{
                        //console.log(data)
                        $scope.proyectos_realizados_luis =  data;
                });
        }

        $scope.obtenerDetalleExperiencia = function(id){
                //console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.experiencia_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalleTrabajoGrado = function(id){
                //console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                //console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});


app.controller('contactoAnaController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.ventas_madre = ventas_madrejs;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});

app.controller('contactoPatriciaController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.ventas_madre = ventas_madrejs;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});

app.controller('contactoYolandaController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.ventas_madre = ventas_madrejs;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});

app.controller('emprenderInternetController', function(postService, $scope, $rootScope){
	$scope.emprender_internet = emprender_internetjs;
        $scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});

app.controller('agenciaEmpresasController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});


app.controller('agenciaProfesionalesController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});

app.controller('agenciaEmprendedoresController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.tecnologia = []
        $scope.proyectos = servicio_comunitario_luis;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
        $scope.trabajo_grado_luis = trabajo_grado_luis;
        $scope.obtenerDetalleTrabajoGrado = function(id){
                console.log('obtenerDetalleTrabajoGrado')
                var proyecto = {};
                for(let proyecto2 of $scope.trabajo_grado_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
        $scope.obtenerDetalle = function(id){
                console.log('obtenerDetalle')
                var proyecto = {};
                for(let proyecto2 of $scope.proyectos_realizados_luis){
                        if(proyecto2.id == id){
                                proyecto = proyecto2;
                        }
                }
                $scope.tecnologia = proyecto.tecnologia
                
        };
});

app.controller('contactoEmpresaController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.descripcion_p = {
            titulo:"Proyectos",
            descripcion:"Los siguientes proyectos fueron desarrollados"
        };
        $scope.proyectos = proyectosjs;
});

app.controller('mainController', function(postService, $scope, $rootScope){
	//$scope.sesion = sesionjs;
        $scope.servicios = serviciosjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.descripcion_p = {
            titulo:"Proyectos",
            descripcion:"Los siguientes proyectos fueron desarrollados"
        };
        $scope.proyectos = proyectosjs;
        $scope.proyectos_realizados_luis = proyectos_realizados_luis;
});


app.controller('contactoPercyController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.descripcion_p = {
            titulo:"Proyectos",
            descripcion:"Los siguientes proyectos fueron desarrollados"
        };
        $scope.proyectos = proyectosjs;
});

app.controller('contactoJuanController', function(postService, $scope, $rootScope){
	$scope.sesion = sesionjs;
        $scope.menu = menujs;
        $scope.contactos = contactosjs;
        $scope.descripcion_p = {
            titulo:"Proyectos",
            descripcion:"Los siguientes proyectos fueron desarrollados"
        };
        $scope.proyectos = proyectosjs;
});

app.controller('authController', function($scope, $http, $rootScope, $location){
  $scope.user = {username: '', password: ''};
  $scope.error_message = '';


});