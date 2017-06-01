package vue;

import java.awt.event.ActionListener;
import java.util.ArrayList;
import java.awt.Color;
import java.awt.Font;
import java.awt.Insets;
import java.awt.event.ActionEvent;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JScrollPane;
import javax.swing.JTable;
import javax.swing.JTextField;

import controleur.Admin;
import modele.ModeleAdmin;

public class vueAAdmin extends JPanel implements ActionListener {
	
	private JComboBox liste;
	private JButton btClose = new JButton("X");
	private JTextField txtNom = new JTextField();
	private JTextField txtPwd = new JTextField();
	private JTextField txtPrenom = new JTextField();
	private JTextField txtEmail = new JTextField();
	private JButton btAdd = new JButton("Insérer");
	private JLabel nom = new JLabel("Nom : ");
	private JLabel pwd = new JLabel("Mot de passe : ");
	private JLabel prenom = new JLabel("Prenom : ");
	private JLabel email = new JLabel("Email : ");
	
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueAAdmin(){
		Object[] elements = new Object[]{"Teub", "Morguant"};
		
		liste = new JComboBox(elements);
		
		this.liste.setBounds(150, 50, 150, 20);
		
		this.setBounds(20,20,750,200);
		this.setBackground(Color.white);
		this.setLayout(null);
		this.add(this.txtNom);
		this.add(this.txtPwd);
		this.add(this.txtPrenom);
		this.add(this.txtEmail);
		this.add(this.btAdd);
		this.add(this.btClose);
		
		this.add(this.nom);
		this.nom.setBounds(70,9,100,20);
		this.add(this.pwd);
		this.pwd.setBounds(60,49,100,20);
		this.add(this.prenom);
		this.prenom.setBounds(70,88,100,20);
		this.add(this.email);
		this.email.setBounds(70,128,100,20);
		
		
		this.txtNom.setBounds(150, 10, 150, 20);
		this.txtPwd.setBounds(150, 50, 150, 20);
		this.txtPrenom.setBounds(150, 90, 150, 20);
		this.txtEmail.setBounds(150, 130, 150, 20);
		this.btAdd.addActionListener(this);
		this.btAdd.setBounds(320,160,100,30);
		this.btClose.addActionListener(this);
		this.btClose.setFont(f);
		this.btClose.setForeground(Color.WHITE);
		this.btClose.setMargin(new Insets(0, 0, 0, 0));
		this.btClose.setBounds(730,0,20,20);
		this.btClose.setBackground(Color.red);
		
		this.setVisible(true);
	}

	@Override
	public void actionPerformed(ActionEvent e) {
		if (e.getSource()==this.btClose) {
			this.setVisible(false);
		}
		
		if (e.getSource()==this.btAdd) {
			ModeleAdmin.add(this.txtNom.getText(),this.txtPrenom.getText(),this.txtPwd.getText(),this.txtEmail.getText());
		}
	}
}