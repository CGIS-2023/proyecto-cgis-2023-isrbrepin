
# 1. Dominio del problema

La gestión de camas en un centro hospitalario constituye una de las tareas cotidianas de cualquier servicio de admisión y también una de la que más conflictos provocan en el funcionamiento diario del hospital. La asignación de la cama al paciente que va a ingresar constituye sólo una parte de lo que se denomina Gestión de camas, y afecta tanto a los pacientes que van a ingresar como a los ya ingresados, y a las camas libres tanto como a las ocupadas.

# 2. Objetivos

La exigencia de un adecuado control en la ocupación de camillas hospitalarias hace que se requiera una adecuada gestión de la información, un conocimiento sobre las diferentes salas de camillas, tipos de camillas, ocupación de las mismas, médicos encargados de cada paciente que tendrá una sala asignada, etc.… Dada esta situación, se plantea crear, una aplicación web donde cada usuario tendrá su propio acceso.

# 3. Usuarios del sistema
Los tres usuarios que van a poder acceder al sistema van a ser: 
- Administrador 
-  Celador, solo podrá visualizar los datos que le corresponda. 
-  Médico, solo podrá visualizar los datos que le corresponda.
# 4. Catálogo de requisitos
## 4.1 Requisitos de información
**RI-001. Médicos.** El sistema deberá de almacenar información sobre los médicos. Nombre y apellido, password, especialidad, fecha de nacimiento, si está vacunado de COVID o no, teléfono, sueldo, y fecha de contratación. Cada médico se encargará de (1..N) salas. Un médico se encarga de N pacientes. Un medico tiene (1..N) especialidades. 

**RI-002. Celadores.** El sistema deberá de almacenar información sobre los celadores. Nombre y apellido, password, fecha de nacimiento, teléfono, fecha de contratación y sueldo. Cada celador se encargará de (1..N) salas. Un celador se encarga de N pacientes. 

**RI-003. Pacientes.** El sistema deberá de almacenar información sobre los pacientes. Nombre y apellido, fecha de nacimiento, fecha del diagnóstico, código postal, teléfono, email, número de la seguridad social, DNI y patologías. Cada paciente tiene (1..N) patologías. 1 paciente está asociado a 1 camilla. 

**RI-004. Salas.** El sistema deberá de almacenar información sobre las salas. La planta en la que está situada la sala, el número de la sala, si la sala está completa o no, así como el celador asignado a la sala. N salas tiene asociadas N camillas. 

**RI-005. Camillas.** El sistema deberá de almacenar información sobre las camillas. Tipo de camilla, médico responsable de la camilla y el precio. N camillas pertenecen a 1 empresa. 

**RI-006. Especialidad.** El sistema deberá de almacenar información sobre las especialidades de los médicos. Estas pueden ser: cardiólogo, neurólogo, gastroenterólogo, neumólogo y traumatólogo. 

**RI-007. Patología.** El sistema deberá de almacenar información sobre las patologías de los pacientes. Estas pueden ser: cardiológica, neurológica, gastrointestinal, respiratoria y traumatológica. 

**RI-008. SalaCamilla.** El sistema deberá de almacenar información sobre las camillas. Inicio y fin de la estancia, tiempo hospitalizado, si la camilla está en uso.

## 4.2. Requisitos funcionales
**RF-001. Listado de médicos.** Como administrador, quiero ver un listado de los médicos del sistema paginados de 25 en 125. 

**RF-002. Detalle de médico.** Como administrador, quiero ver el detalle de un médico. 

**RF-003. Creación de médico.** Como administrador, quiero crear un médico. Para ello, se debe indicar el nombre y apellido, especialidad, fecha de nacimiento, email, teléfono, DNI, si está vacunado o no de COVID, sueldo, y fecha de contratación. Deberé poder elegir la especialidad del médico entre el listado de especialidades ya existentes en la base de datos del sistema. El sistema debe impedir la creación de médico si: 
- El email ya existe. 
- El email no tiene el formato correcto. 
- La contraseña no tiene al menos 8 caracteres y viene la contraseña y su confirmación.
- El sueldo no puede ser negativo 
- La especialidad tiene que ser una de las ya disponibles en el sistema. 

El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de médicos con un mensaje de éxito. 

**RF-004. Edición de médico.** Como administrador, quiero editar un médico eligiéndolo a partir del listado de médicos y llevándome a una nueva pantalla donde pueda trabajar con los datos. Para ello, se debe poder modificar el nombre y apellido, email, fecha de contratación, si está vacunado de COVID o no, el sueldo y la especialidad. Deberé poder elegir la especialidad del médico entre el listado de especialidades ya existentes en la base de datos del sistema. El sistema debe impedir la edición de médico si: 
- El email no tiene el formato correcto.
- La contraseña no tiene al menos 8 caracteres y viene la contraseña y su confirmación. 
- El sueldo no puede ser negativo 
- La especialidad tiene que ser una de las ya disponibles en el sistema. 

El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de médicos con un mensaje de éxito. 

**RF-005. Borrado de médico.** Como administrador, quiero borrar un médico. El sistema deberá alertarme de la irrevocabilidad de esta acción y pedir confirmación. En caso de confirmación, el sistema deberá borrar el médico y navegar al listado actualizado de médicos con un mensaje de éxito. 

**RF-006. Listado de celadores.** Como administrador, quiero ver un listado de los celadores del sistema paginados de 25 en 25. 

**RF-007. Detalle de celador**. Como administrador, quiero ver el detalle de un celador. 

**RF-008. Creación de celador.** Como administrador, quiero crear un celador. Para ello, se debe indicar el nombre y apellido, fecha de nacimiento, teléfono, email, DNI, fecha de contratación y sueldo. El sistema debe impedir la creación de celador si: - El email ya existe. 
- El email no tiene el formato correcto.
- La contraseña no tiene al menos 8 caracteres y viene la contraseña y su confirmación. 
- El sueldo no puede ser negativo 

El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de celadores con un mensaje de éxito. 

**RF-009. Edición de celador.** Como administrador, quiero editar un celador eligiéndolo a partir del listado de celadores y llevándome a una nueva pantalla donde pueda trabajar con los datos. Para ello, se debe poder modificar el nombre y apellido, fecha de nacimiento, teléfono, email, DNI, fecha de contratación y sueldo. El sistema debe impedir la edición de médico si: 
- El email no tiene el formato correcto. 
- La contraseña no tiene al menos 8 caracteres y viene la contraseña y su confirmación. 
- El sueldo no puede ser negativo. 

El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de médicos con un mensaje de éxito. 

**RF-010. Borrado de celador.** Como administrador, quiero borrar un celador. El sistema deberá alertarme de la irrevocabilidad de esta acción y pedir confirmación. En caso de confirmación, el sistema deberá borrar el celador y navegar al listado actualizado de celadores con un mensaje de éxito. 

**RF-011. Listado de pacientes.** Como administrador, quiero ver un listado de los pacientes del sistema paginados de 25en 25. 

**RF-012. Detalle de paciente.** Como administrador, quiero ver el detalle de un paciente. 
**RF-013. Creación de paciente.** Como administrador, quiero crear un paciente. Para ello, se debe indicar el nombre y apellido, fecha de nacimiento, código postal, teléfono, email, número de la seguridad social, DNI y patologías. Deberé poder elegir la patología del paciente entre el listado de patologías ya existentes en la base de datos del sistema. El sistema debe impedir la creación de paciente si: 
- El email ya existe. 
- El email no tiene el formato correcto. 
- El DNI ya existe.
- El DNI no tiene el formato correcto. 
- El número de la seguridad social ya existe. 
- La patología tiene que ser una de las ya disponibles en el sistema. 

El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de pacientes con un mensaje de éxito. 

**RF-014. Edición de paciente.** Como administrador, quiero editar un paciente eligiéndolo a partir del listado de pacientes y llevándome a una nueva pantalla donde pueda trabajar con los datos. Para ello, se debe poder modificar el nombre y apellido, fecha de nacimiento, código postal, teléfono, email, número de la seguridad social, DNI y patologías. Deberé poder elegir la patología del paciente entre el listado de patologías ya existentes en la base de datos del sistema. El sistema debe impedir la edición de paciente si: 
- El email no tiene el formato correcto. 
- El DNI no tiene el formato correcto.
- La patología tiene que ser una de las ya disponibles en el sistema. 

El sistema además deberá mostrar un mensaje de error en cada uno de los casos anteriores y, en caso de éxito, navegar al listado actualizado de médicos con un mensaje de éxito. 

**RF-015. Borrado de paciente.** Como administrador, quiero borrar un paciente. El sistema deberá alertarme de la irrevocabilidad de esta acción y pedir confirmación. En caso de confirmación, el sistema deberá borrar el paciente y navegar al listado actualizado de pacientes con un mensaje de éxito. 

**RF-016. Listado de pacientes.** Como médico, quiero ver un listado de los pacientes del sistema que tengo asignados. 

**RF-017. Detalle de paciente.** Como médico, quiero ver el detalle de un paciente. 

**RF-018. Listado de pacientes.** Como celador, quiero ver un listado de los pacientes del sistema que tengo asignados. 

**RF-019. Detalle de paciente.** Como celador, quiero ver el detalle de un paciente. 

**RF-020. Tiempo hospitalizado.** Como celador, quiero una lista con las horas de inicio y fin (en caso de que haya) de las salas que tengo asignadas. 

**RF-021. Detalles camilla.** Como celador, quiero una lista donde aparezca toda la información sobre las camillas. 

**RF-022. Precio camillas.** Como celador, quiero una lista donde aparezca el precio total de las camillas del hospital. 

**RF-023. Salas asignadas.** Como médico, quiero una lista de todas las salas que tengo asignadas, junto al paciente. 

**RF-024. Salas asignadas.** Como celador, quiero una lista de todas las salas que tengo asignadas, junto al paciente. 

**RF-025. Camillas recientes.** Como celador, quiero una lista con las camillas que tengan menos de 3 años desde su adquisición. 

**RF-026. Costo anual trabajadores.** Como administrador, quiero ver un listado de los sueldos (el costo que tendría en 12 meses) de cada uno de los trabajadores. 

**RF-027. Costo total trabajadores.** Como administrador, el costo total en un mes de los trabajadores actuales de la empresa.

## 4.3. Reglas de negocio
**RN-001.** A un médico solo puede asignársele un paciente con una patología en la que esté especializado. 

**RN-002.** Un celador solo puede tener asignado 10 pacientes como máximo a la vez. 

**RN-003.** Un médico solo puede tener asignado 8 pacientes como máximo a la vez. 

**RN-004.** Las salas para pacientes con problemas cardiológicos estarán en la planta 1, los neurológicos en la planta 2, los gastrointestinales en la planta 3, los respiratorios en la planta 4 y los traumatológicos en la planta 5. 

**RN-005.** El sueldo de los celadores debe estar entre los 1200 y 1400 euros. 

**RN-006.** No se podrá asignar pacientes a salas completas.

**RN-007.** Una camilla no podrá superar la fecha de fin de vida útil.

# 5. Modelo conceptual UML
![Modelo.png](public%2FModelo.png)