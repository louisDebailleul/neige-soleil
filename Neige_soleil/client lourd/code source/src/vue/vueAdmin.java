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

import controleur.Admin;
import modele.ModeleAdmin;

public class vueAdmin extends JPanel implements ActionListener {
	
	private JTable uneTable;
	private JButton btClose = new JButton("X");
	private JLabel title = new JLabel("Admins");
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueAdmin(){
		this.setBounds(20,250,750,200);
		this.setBackground(Color.white);
		this.setLayout(null);
		String entete[]={"ID","Nom","Prenom","Mot de Passe","Email"};
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
		ArrayList<Admin> lesAdmins = ModeleAdmin.selectAll();
		Object donnees [][] = new Object[lesAdmins.size()][5];
		int i = 0;
		for (Admin unAdmin : lesAdmins) {
			donnees[i][0] = unAdmin.getIdC();
			donnees[i][1] = unAdmin.getNom();
			donnees[i][2] = unAdmin.getPrenom();
			donnees[i][3] = unAdmin.getPassword();
			donnees[i][4] = unAdmin.getEmail();
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