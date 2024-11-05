package es.iespuertodelacruz.jc.proyectobase.controller;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class PruebaConcurrencia
 */
@WebServlet({ "/PruebaConcurrencia", "/concurrencia" })
public class PruebaConcurrencia extends HttpServlet {
	private static final long serialVersionUID = 1L;
	
	private int contador=0;
	
    /**
     * @see HttpServlet#HttpServlet()
     */
    public PruebaConcurrencia() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
			String strContador = request.getParameter("contador");
			this.contador = Integer.parseInt(strContador);
		}catch(Exception ex) {ex.printStackTrace();}
		
		try {
			Thread.sleep(200);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		response.getWriter().append("Contador: "+this.contador).append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
