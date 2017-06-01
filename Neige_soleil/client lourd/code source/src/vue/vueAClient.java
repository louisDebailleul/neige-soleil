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

import controleur.Client;
import modele.ModeleClient;

public class vueAClient extends JPanel implements ActionListener {
	
	private JComboBox liste;
	private JButton btClose = new JButton("X");
	private JTextField txtNom = new JTextField();
	private JTextField txtPwd = new JTextField();
	private JTextField txtPrenom = new JTextField();
	private JTextField txtEmail = new JTextField();
	private JTextField txtVille = new JTextField();
	private JTextField txtAdresse = new JTextField();
	private JTextField txtCode = new JTextField();
	private JTextField txtTel = new JTextField();
	private JButton btAdd = new JButton("Insérer");
	private JLabel nom = new JLabel("Nom : ");
	private JLabel pwd = new JLabel("Mot de passe : ");
	private JLabel prenom = new JLabel("Prenom : ");
	private JLabel email = new JLabel("Email : ");
	private JLabel ville = new JLabel("Ville : ");
	private JLabel adresse = new JLabel("Adresse : ");
	private JLabel code = new JLabel("Code Postal : ");
	private JLabel tel = new JLabel("Telephone : ");
	Font f = new Font("Arial", Font.BOLD, 12);
	
	public vueAClient(){
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
		this.add(this.txtVille);
		this.add(this.txtAdresse);
		this.add(this.txtCode);
		this.add(this.txtTel);
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
		this.add(this.ville);
		this.ville.setBounds(435,9,100,20);
		this.add(this.adresse);
		this.adresse.setBounds(435,49,100,20);
		this.add(this.code);
		this.code.setBounds(435,88,100,20);
		this.add(this.tel);
		this.tel.setBounds(435,128,100,20);
		
		
		this.txtNom.setBounds(150, 10, 150, 20);
		this.txtPwd.setBounds(150, 50, 150, 20);
		this.txtPrenom.setBounds(150, 90, 150, 20);
		this.txtEmail.setBounds(150, 130, 150, 20);
		this.txtVille.setBounds(515, 10, 150, 20);
		this.txtAdresse.setBounds(515, 50, 150, 20);
		this.txtCode.setBounds(515, 90, 150, 20);
		this.txtTel.setBounds(515, 130, 150, 20);
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
			ModeleClient.add(this.txtNom.getText(),this.txtPwd.getText(),this.txtPrenom.getText(),this.txtEmail.getText(),this.txtVille.getText(),this.txtAdresse.getText(),this.txtCode.getText(),this.txtTel.getText());
		}
	}
}
