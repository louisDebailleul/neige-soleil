package controleur;

public class Admin {
	int idC;
	private String nom, prenom, password, email;
	
	public Admin()
	{
		this.idC=0;
		this.nom = this.password = this.prenom = this.email = "";
	}
	
	public Admin(int idC, String nom, String prenom, String password, String email) {
		this.idC = idC;
		this.nom = nom;
		this.password = password;
		this.prenom = prenom;
		this.email = email;
	}

	public int getIdC() {
		return idC;
	}

	public void setIdC(int idC) {
		this.idC = idC;
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

	public void setPassword(String password) {
		this.password = password;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}
	
}