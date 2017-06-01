package controleur;

public class Profil {
	private String idC, nom, prenom;
	private String password;
	
	public Profil (String idC, String nom, String prenom, String password)
	{
		this.idC = idC;
		this.nom = nom;
		this.prenom = prenom;
		this.password = password;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getPrenom() {
		return prenom;
	}

	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String Password) {
		this.password = password;
	}
	
	
}
