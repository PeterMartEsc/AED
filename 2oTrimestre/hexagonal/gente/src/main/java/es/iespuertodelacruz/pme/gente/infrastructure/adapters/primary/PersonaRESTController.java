package es.iespuertodelacruz.pme.gente.infrastructure.adapters.primary;

import es.iespuertodelacruz.pme.gente.domain.model.Persona;
import es.iespuertodelacruz.pme.gente.domain.ports.primary.IPersonaService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

record PersonaDTO(Integer id, String nombre, int edad){}

@RestController
@RequestMapping("/api/personas")
@CrossOrigin
public class PersonaRESTController {

    @Autowired
    IPersonaService personaService;

    public ResponseEntity<?> guardar(PersonaDTO dto){
        Persona p = new Persona(dto.id(), dto.nombre(), dto.edad());
        //Persona saved = personaService.crear(p.getNombre(), p.getEdad());
        Persona saved = personaService(p);

        PersonaDTO savedDTO = new PersonaDTO(saved.getId(), saved.getNombre(), saved.getEdad());
        return ResponseEntity.ok(savedDTO);
    }

}
