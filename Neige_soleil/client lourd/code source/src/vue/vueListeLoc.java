package vue;

import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.awt.Color;
import java.awt.Font;
import java.awt.Insets;
import java.awt.event.ActionEvent;

import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;

import controleur.ListeLoc;
import modele.ModeleListeLoc;

public class vueListeLoc extends JPanel implements ActionListener {
	
	private JTable uneTable;
	private JButton btClose = new JButton("X");
	private JLabel title = new JLabel("Locations");
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueListeLoc(){
		this.setBounds(20,250,750,200);
		this.setBackground(Color.white);
		this.setLayout(null);
		String entete[]={"idL","Nom","Chambres","Places","Ville","Adresse","CP","Vallee","Prix J","Prix S","Detail","Douches","ID Locataire"};
		this.uneTable = new JTable(this.remplirDonnees(), entete);
		JScrollPane uneScroll = new JScrollPane(this.uneTable);
		uneScroll.setBounds(0,20,750,180);
		this.add(uneScroll);
		
		this.add(this.btClose);
		this.add(this.title);
		this.title.setBounds(10, 4, 100, 10);
		this.btClose.addActionListener(this);
		this.btClose.setFont(f);
		this.btClose.setForeground(Color.WHITE);
		this.btClose.setMargin(new Insets(0, 0, 0, 0));
		this.btClose.setBounds(730,0,20,20);
		this.btClose.setBackground(Color.red);
		
		this.setVisible(true);
	}
	
	public Object[][] remplirDonnees() {
		ArrayList<ListeLoc> lesListeLocs = ModeleListeLoc.selectAll();
		Object donnees [][] = new Object[lesListeLocs.size()][13];
		int i = 0;
		for (ListeLoc uneListeLoc : lesListeLocs) {
			donnees[i][0] = uneListeLoc.getIdL();
			donnees[i][1] = uneListeLoc.getNom();
			donnees[i][2] = uneListeLoc.getChambre();
			donnees[i][3] = uneListeLoc.getPlace();
			donnees[i][4] = uneListeLoc.getVille();
			donnees[i][5] = uneListeLoc.getAdresse();
			donnees[i][6] = uneListeLoc.getCodeP();
			donnees[i][7] = uneListeLoc.getVallee();
			donnees[i][8] = uneListeLoc.getPrixJ();
			donnees[i][9] = uneListeLoc.getPrixS();
			donnees[i][10] = uneListeLoc.getDetail();
			donnees[i][11] = uneListeLoc.getDouche();
			donnees[i][12] = uneListeLoc.getLocataire_id();
			i++;
		}
		
		return donnees;
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource()==this.btClose) {
			this.setVisible(false);
		}
	}
}
