package vue;

import java.awt.Color;
import java.awt.Font;
import java.awt.GridLayout;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.event.KeyListener;

import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;

import controleur.Main;
import controleur.Profil;
import modele.Modele;

public class VueProfil extends JPanel implements ActionListener, KeyListener {
	
		private JButton btAnnuler = new JButton("Annuler");
		private JButton btConnecter = new JButton("Se connecter");
		private JTextField txtPseudo = new JTextField();
		private JPasswordField txtMdp = new JPasswordField();
		Font f = new Font("Arial", Font.BOLD, 12);
		
		public VueProfil() {
			this.setBounds(130, 80, 250, 100);
			this.setLayout(new GridLayout(3,2));
			this.setBackground(new Color(106,168,213));
			this.add(new JLabel("Pseudo : "));
			this.add(this.txtPseudo);
			this.add(new JLabel("MDP : "));
			this.add(this.txtMdp);
			this.add(this.btAnnuler);
			this.add(this.btConnecter);
			
			/*Font police = new Font("Helvetica",Font.ITALIC,16);
			this.btAnnuler.setFont(police);*/
			this.btAnnuler.setText("Annuler");
			
			this.txtMdp.addKeyListener(this);
			this.txtPseudo.addKeyListener(this);
			this.btAnnuler.addActionListener(this);
			this.btConnecter.addActionListener(this);
			this.setVisible(true);
		}
		
		public void traitement() {
			String nom = this.txtPseudo.getText();
			String password = new String(this.txtMdp.getPassword());
			Profil unProfil = Modele.verifConnexion(nom, password);
			if(unProfil == null) {
				JOptionPane.showMessageDialog(this, "Erreur de connexion");
			}
			else {
				JOptionPane.showMessageDialog(this, "Vous êtes "
						+ " connecté avec \n"+unProfil.getNom());

				new vueGeneral();
				this.txtMdp.setText("");
				this.txtPseudo.setText("");
				Main.rendreVisible(false);
				
			}
		}
		
		@Override
		public void actionPerformed(ActionEvent e) {
			if (e.getSource()==this.btAnnuler) {
				this.txtMdp.setText("");
				this.txtPseudo.setText("");
			}
			else if (e.getSource() == this.btConnecter) {
				this.traitement();
			}
		}
		
		@Override
		public void keyPressed(KeyEvent e) {
			if (e.getKeyCode() == KeyEvent.VK_ENTER) {
				this.traitement();
			}
			
		}

		@Override
		public void keyReleased(KeyEvent arg0) {
			// TODO Auto-generated method stub
			
		}

		@Override
		public void keyTyped(KeyEvent arg0) {
			// TODO Auto-generated method stub
			
		}
}

		
