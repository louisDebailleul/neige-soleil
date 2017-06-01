package controleur;

public class Client {
	int idC;
	private String nom, password, prenom, email, ville, adresse, codeP, tel;
	
	public Client()
	{
		this.idC=0;
		this.nom = this.password = this.prenom = this.email = this.ville = this.adresse = this.codeP = this.tel = "";
	}
	
	public Client(int idC, String nom, String password, String prenom, String email, String ville, String adresse, String codeP, String tel ) {
		this.idC = idC;
		this.nom = nom;
		this.password = password;
		this.prenom = prenom;
		this.email = email;
		this.ville = ville;
		this.adresse = adresse;
		this.codeP = codeP;
		this.tel = tel;
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

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getPrenom() {
		return prenom;
	}

	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}

	public String getEmail() {
		return email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getVille() {
		return ville;
	}

	public void setVille(String ville) {
		this.ville = ville;
	}

	public String getAdresse() {
		return adresse;
	}

	public void setAdresse(String adresse) {
		this.adresse = adresse;
	}

	public String getCodeP() {
		return codeP;
	}

	public void setCodeP(String codeP) {
		this.codeP = codeP;
	}

	public String getTel() {
		return tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}

	
	
	
}