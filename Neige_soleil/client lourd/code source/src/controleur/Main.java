package controleur;
import vue.Gestion;

public class Main {
	private static Gestion uneGestion ;
	
	public Main ()
	{
		uneGestion = new Gestion ();
	}
	
	public static void main (String args[]) {
		new Main();
	}
	
	public static void rendreVisible(boolean valeur)
	{
		uneGestion.setVisible(valeur);
	}
}
