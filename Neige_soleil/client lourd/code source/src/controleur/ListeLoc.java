package controleur;

public class ListeLoc {
	int idL, chambre, place, douche,locataire_id;
	private String Nom, ville, adresse, codeP, vallee, detail;
	float prixJ, prixS;
	
	public ListeLoc()
	{
		this.idL = this.chambre = this.place = this.douche = this.locataire_id =0;
		this.Nom = this.ville = this.adresse = this.codeP = this.vallee = this.detail = "";
		this.prixJ = this.prixS = 0;
	}
	
	public ListeLoc(int idL, String Nom, int chambre, int place, String ville, String adresse, String codeP, String vallee, float prixJ, float prixS, String detail, int douche, int locataire_id) {
		this.idL = idL;
		this.Nom = Nom;
		this.chambre = chambre;
		this.place = place;
		this.ville = ville;
		this.adresse = adresse;
		this.codeP = codeP;
		this.vallee = vallee;
		this.prixJ = prixJ;
		this.prixS = prixS;
		this.detail = detail;
		this.douche = douche;
		this.locataire_id = locataire_id;
	}

	public int getIdL() {
		return idL;
	}

	public void setIdL(int idL) {
		this.idL = idL;
	}

	public int getChambre() {
		return chambre;
	}

	public void setChambre(int chambre) {
		this.chambre = chambre;
	}

	public int getPlace() {
		return place;
	}

	public void setPlace(int place) {
		this.place = place;
	}

	public int getDouche() {
		return douche;
	}

	public void setDouche(int douche) {
		this.douche = douche;
	}

	public int getLocataire_id() {
		return locataire_id;
	}

	public void setLocataire_id(int locataire_id) {
		this.locataire_id = locataire_id;
	}

	public String getNom() {
		return Nom;
	}

	public void setNom(String nom) {
		Nom = nom;
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

	public String getVallee() {
		return vallee;
	}

	public void setVallee(String vallee) {
		this.vallee = vallee;
	}

	public String getDetail() {
		return detail;
	}

	public void setDetail(String detail) {
		this.detail = detail;
	}

	public float getPrixJ() {
		return prixJ;
	}

	public void setPrixJ(float prixJ) {
		this.prixJ = prixJ;
	}

	public float getPrixS() {
		return prixS;
	}

	public void setPrixS(float prixS) {
		this.prixS = prixS;
	}	
	
}