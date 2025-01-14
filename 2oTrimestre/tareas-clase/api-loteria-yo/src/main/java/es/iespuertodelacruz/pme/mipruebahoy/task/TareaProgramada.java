package es.iespuertodelacruz.pme.mipruebahoy.task;

import org.springframework.scheduling.annotation.Scheduled;
import org.springframework.stereotype.Component;

import java.util.Date;


@Component
public class TareaProgramada {
	public static final long PERIODICIDAD = 10000;
	   
    @Scheduled(fixedRate = PERIODICIDAD ) // 3600000 ms = 1 hora
	public void tarea() {

	}
	
}




